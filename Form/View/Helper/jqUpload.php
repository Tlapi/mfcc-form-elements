<?php 
namespace MfccFormElements\Form\View\Helper;

use MyModule\Form\Element;
use Zend\Form\View\Helper\FormElement as BaseFormElement;
use Zend\Form\ElementInterface;

class FormElement extends BaseFormElement
{
	public function render(ElementInterface $element)
	{
		$renderer = $this->getView();
		if (!method_exists($renderer, 'plugin')) {
			// Bail early if renderer is not pluggable
			return '';
		}

		if ($element instanceof Element\Foo) {
			$helper = $renderer->plugin('form_foo');
			return $helper($element);
		}

		return parent::render($element);
	}
}