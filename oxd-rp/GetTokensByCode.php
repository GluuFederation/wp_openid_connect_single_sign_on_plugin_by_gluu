<?php
	
	/**
	 * Gluu-oxd-library
	 *
	 * An open source application library for PHP
	 *
	 *
	 * @copyright Copyright (c) 2017, Gluu Inc. (https://gluu.org/)
	 * @license	  MIT   License            : <http://opensource.org/licenses/MIT>
	 *
	 * @package	  Oxd Library by Gluu
	 * @category  Library, Api
	 * @version   3.0.1
	 *
	 * @author    Gluu Inc.          : <https://gluu.org>
	 * @link      Oxd site           : <https://oxd.gluu.org>
	 * @link      Documentation      : <https://gluu.org/docs/oxd/3.0.1/libraries/php/>
	 * @director  Mike Schwartz      : <mike@gluu.org>
	 * @support   Support email      : <support@gluu.org>
	 * @developer Volodya Karapetyan : <https://github.com/karapetyan88> <mr.karapetyan88@gmail.com>
	 *
	 
	 *
	 * This content is released under the MIT License (MIT)
	 *
	 * Copyright (c) 2017, Gluu inc, USA, Austin
	 *
	 * Permission is hereby granted, free of charge, to any person obtaining a copy
	 * of this software and associated documentation files (the "Software"), to deal
	 * in the Software without restriction, including without limitation the rights
	 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	 * copies of the Software, and to permit persons to whom the Software is
	 * furnished to do so, subject to the following conditions:
	 *
	 * The above copyright notice and this permission notice shall be included in
	 * all copies or substantial portions of the Software.
	 *
	 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	 * THE SOFTWARE.
	 *
	 */
	
	/**
	 * Client tokens code class
	 *
	 * Class is connecting to oxd-server via socket, and getting token code from gluu-server.
	 *
	 * @package		  Gluu-oxd-library
	 * @subpackage	Libraries
	 * @category	  Relying Party (RP)
	 * @see	        Client_OXD_RP
	 */

	require_once 'ClientOXDRP.php';
	
	class GetTokensByCode extends ClientOXDRP
{
    /**start parameter for request!**/
    private $request_oxd_id = null;
    private $request_code = null;
    private $request_state = null;
    private $request_nonce  = null;
    /**end request parameter**/

    /**start parameter for response!**/
    private $response_access_token;
    private $response_expires_in;
    private $response_id_token;
    private $response_id_token_claims;
    /**end response parameter**/

    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
    }


    /**
     * @return mixed
     */
    public function getRequestOxdId()
    {
        return $this->request_oxd_id;
    }

    /**
     * @return null
     */
    public function getRequestNonce()
    {
        return $this->request_nonce;
    }

    /**
     * @param null $request_nonce
     */
    public function setRequestNonce($request_nonce)
    {
        $this->request_nonce = $request_nonce;
    }

    /**
     * @param mixed $request_oxd_id
     */
    public function setRequestOxdId($request_oxd_id)
    {
        $this->request_oxd_id = $request_oxd_id;
    }

    /**
     * @return null
     */
    public function getRequestState()
    {
        return $this->request_state;
    }

    /**
     * @param null $request_state
     */
    public function setRequestState($request_state)
    {
        $this->request_state = $request_state;
    }

    /**
     * @return null
     */
    public function getRequestCode()
    {
        return $this->request_code;
    }

    /**
     * @param null $request_code
     */
    public function setRequestCode($request_code)
    {
        $this->request_code = $request_code;
    }

    /**
     * @return mixed
     */
    public function getResponseAccessToken()
    {
        $this->response_access_token = $this->getResponseData()->access_token;
        return $this->response_access_token;
    }



    /**
     * @return mixed
     */
    public function getResponseIdToken()
    {
        $this->response_id_token = $this->getResponseData()->id_token;
        return $this->response_id_token;
    }

    /**
     * @return mixed
     */
    public function getResponseIdTokenClaims()
    {
        $this->response_id_token_claims = $this->getResponseData()->id_token_claims;
        return $this->response_id_token_claims;
    }

    public function setCommand()
    {
        $this->command = 'get_tokens_by_code';
    }

    public function setParams()
    {
        $this->params = array(
            "oxd_id" => $this->getRequestOxdId(),
            "code" => $this->getRequestCode(),
            "state" => $this->getRequestState(),
            //"nonce" => $this->getRequestNonce(),
        );
    }

}