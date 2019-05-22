<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 11:33 PM
 */

namespace JL\Controllers\Site;


use JL\Abstracts\AbstractController;
use JL\Modules\Counties\CountyService;
use JL\Modules\Generator\GeneratorService;
use JL\Modules\Reports\ReportDao;
use JL\Modules\Reports\ReportService;
use Qpdb\HtmlBuilder\Html;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends AbstractController
{

	public function __invoke( Request $request, Response $response, array $args = [] ) {
		if($request->isPost()) {
			CountyService::getInstance()->generateCounties();
			GeneratorService::getInstance()->generateAmounts();
			return $response->withRedirect($request->getUri());
		}
		return parent::__invoke( $request, $response, $args );
	}

	protected function setContent() {
		$tableRows = Html::container();
		foreach ( ReportService::getInstance()->perState() as $sm ) {
			$trow = Html::tr()->withHtmlElement(
				Html::td()->withPlainText( $sm->getState() ),
				Html::td()->withPlainText( $sm->getSumTaxes() ),
				Html::td()->withPlainText( $sm->getAvgTaxes() ),
				Html::td()->withPlainText( $sm->getAvgTaxesPercent() )
			);
			$tableRows->withHtmlElement( $trow );
		}
		$perCountry = ReportDao::getInstance()->perCountry()[0];
		$otherInfo = Html::container()
			->withHtmlElement(
				Html::div()->withClass( 'margin_div ' )
					->withPlainText( 'Average tax rate of the country: ', round($perCountry['percent_avg'],2), ' %' ),
				Html::div()->withClass( 'margin_div ' )
					->withPlainText( 'Collected overall taxes of the country: ', round($perCountry['taxes_sum'] ,0)),
				Html::div()->withClass('margin_div')->withHtmlElement(
					Html::form()->methodPost()->withHtmlElement(
						Html::button()->typeSubmit()->withPlainText('Repopulate DB')
					)
				)
			);
		$this->page->set( 'tableRows', $tableRows );
		$this->page->set( 'otherInfo', $otherInfo );
	}
}