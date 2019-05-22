<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 4:34 AM
 */

namespace JL\Abstracts;


use JL\Core;
use Qpdb\HtmlBuilder\Html;
use Slim\Http\Request;
use Slim\Http\Response;

abstract class AbstractController
{

	/**
	 * @var \Qpdb\HtmlBuilder\Elements\HtmlView
	 */
	protected $page;

	/**
	 * @var Request
	 */
	protected $request;

	/**
	 * @var Response
	 */
	protected $response;

	/**
	 * @var array
	 */
	protected $args;

	/**
	 * AbstractController constructor.
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function __construct() {
		$this->page = Html::view(Core::helper()->getTemplatePath() . '/page_template.phtml');
	}

	public function __invoke(Request $request, Response $response, array $args = []) {
		$this->request = $request;
		$this->response = $response;
		$this->args = $args;
		$this->setContent();
		return $response->write($this->page->getMarkup());
	}

	abstract  protected function setContent();

}