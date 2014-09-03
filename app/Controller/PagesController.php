<?php
App::uses ( 'AppController', 'Controller' );

class PagesController extends AppController {
	
	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	public $uses = array ();		

	public $components = array (
			"Session"
	);	
	/**
	 * Displays a view
	 *
	 * @param
	 *        	mixed What page to display
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *         or MissingViewException in debug mode.
	 */
	public function display() {
		$path = func_get_args ();
		
		$count = count ( $path );
		if (! $count) {
			return $this->redirect ( '/' );
		}
		$page = $subpage = $title_for_layout = null;
		
		if (! empty ( $path [0] )) {
			$page = $path [0];
		}
		if (! empty ( $path [1] )) {
			$subpage = $path [1];
		}
		if (! empty ( $path [$count - 1] )) {
			$title_for_layout = Inflector::humanize ( $path [$count - 1] );
		}
		$this->set ( compact ( 'page', 'subpage', 'title_for_layout' ) );
		
		try {
			$this->render ( implode ( '/', $path ) );
		} catch ( MissingViewException $e ) {
			if (Configure::read ( 'debug' )) {
				throw $e;
			}
			throw new NotFoundException ();
		}
	}
	
	public function test() {
		
	}
};
?>