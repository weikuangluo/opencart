<?php
namespace Opencart\Application\Controller\Startup;
class Startup extends \Opencart\System\Engine\Controller {
	public function index() {
		// Load startup actions
		$this->load->model('setting/startup');

		$results = $this->model_setting_startup->getStartups();

		foreach ($results as $result) {
			if (substr($result['trigger'], 0, 8) == 'catalog/') {
				$this->controller->load(substr($result['action'], 9));
			}
		}
	}
}