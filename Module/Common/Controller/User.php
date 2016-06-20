<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Package\User\Module\Common\Controller;

use Eureka\Component\Debug\Debug;
use Eureka\Package\User\Component\Exception\LoginException;
use Eureka\Package\User\DataMapper\Mapper\User\UserMapper;
use Eureka\Package\User\DataMapper\Data;
use Eureka\Component\Controller\Controller;
use Eureka\Component\Database\Database;
use Eureka\Component\Routing\RouteCollection;
use Eureka\Component\Template\Template;
use Eureka\Component\Template\TemplateInterface;
use Eureka\Component\Response\Html\Template as ResponseTemplate;
use Eureka\Component\Config\Config;
use Eureka\Component\Response\ResponseInterface;
use Eureka\Component\Http;
use Eureka\Component\Password\Password;

/**
 * Controller class
 *
 * @author Romain Cottard
 * @version 2.1.0
 */
class User extends Controller
{
    /**
     * @var string $mainLayoutPath
     */
    protected $mainLayoutPath = '';

    /**
     * @var string $userLayoutPath
     */
    protected $userLayoutPath = '';

    /**
     * @var string $userTemplatePath
     */
    protected $userTemplatePath = '';

    /**
     * @return void
     */
    public function runBefore()
    {
        parent::runBefore();

        $mainLayoutPath = Config::getInstance()->get('Eureka\Global\Theme\php\layout');
        $mainTheme      = Config::getInstance()->get('Eureka\Global\Theme\php\theme');
        $this->mainLayoutPath   = $mainLayoutPath . '/Layout/' . $mainTheme;
        $this->userLayoutPath   = __DIR__ . '/../Layout/' . $mainTheme;
        $this->userTemplatePath = __DIR__ . '/../Template/' . $mainTheme;
    }

    /**
     * User account controller action
     *
     * @return Template
     */
    public function account()
    {
        $this->dataCollection->add('sTitle', 'Account');

        return $this->getResponse('Account', $this->mainLayoutPath . '/Main');
    }

    /**
     * User login controller action
     *
     * @return Template
     */
    public function login()
    {
        $this->dataCollection->add('meta', Config::getInstance()->get('Eureka\Global\Meta'));

        $hasError = false;

        $server  = Http\Server::getInstance();
        $session = Http\Session::getInstance();
        $email   = '';

        if ($server->isPost()) {

            try {

                $userMapper = new UserMapper(Database::get('user'));

                $post = Http\Post::getInstance();
                $user = $userMapper->findByEmail($email = $post->get('email'));
                $user->login(new Password($post->get('password')));

                $session->set('id',    $user->getId());
                $session->set('email', $user->getEmail());


                $server->redirect('/');

            } catch (LoginException $exception) {
                $this->dataCollection->add('error', 'Incorrect login or password!');
                $hasError = true;
            }
        }

        $this->dataCollection->add('email', $email);
        $this->dataCollection->add('hasError', $hasError);

        return $this->getResponse('Login', $this->userLayoutPath . '/Login');
    }

    /**
     * User logout controller action.
     *
     * @return Template
     */
    public function logout()
    {
        Http\Session::getInstance()->set('id', null)->set('email', null);
        Http\Server::getInstance()->redirect(RouteCollection::getInstance()->get('login')->getUri());
    }

    /**
     * Get Response object
     *
     * @param  string $templateName
     * @param  string $layoutPath
     * @return ResponseInterface
     */
    protected function getResponse($templateName, $layoutPath)
    {
        $this->response = new ResponseTemplate();
        $this->response->setHttpCode(200)->setContent($this->getLayout($this->getTemplate($templateName), $layoutPath));

        return $this->response;
    }

    /**
     * Get Main layout template
     *
     * @param  TemplateInterface $template
     * @param  string            $layoutPath
     * @return Template
     */
    protected function getLayout(TemplateInterface $template, $layoutPath)
    {
        $layout = new Template($layoutPath);
        $layout->setVar('content', $template->render());
        $layout->setVar('meta', Config::getInstance()->get('Eureka\Global\Meta'));

        return $layout;
    }

    /**
     * Get template instance
     *
     * @param  string $templateName
     * @return Template
     */
    protected function getTemplate($templateName)
    {
        $template = new Template($this->userTemplatePath . '/' . $templateName);
        $template->setVars($this->dataCollection->toArray());

        return $template;
    }

}
