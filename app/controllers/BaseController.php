<?php

class BaseController extends Controller {

    /**
     * @return User
     */
    protected function me()
    {
        return Auth::user();
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
