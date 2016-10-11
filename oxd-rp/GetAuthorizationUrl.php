<?php
/**
 * Created Vlad Karapetyan
 */

require_once 'ClientOXDRP.php';

class GetAuthorizationUrl extends ClientOXDRP
{
    /**start parameter for request!**/
    private $request_oxd_id = null;
    private $request_acr_values = null;
    private $request_prompt = null;
    private $request_scope = null;
    private $request_HD = null;
    /**end request parameter**/

    /**start parameter for response!**/
    private $response_authorization_url;
    /**end response parameter**/

    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
    }

    /**
     * @return null
     */
    public function getRequestHD()
    {
        return $this->request_HD;
    }

    /**
     * @param null $request_HD
     */
    public function setRequestHD($request_HD)
    {
        $this->request_HD = $request_HD;
    }

    /**
     * @return null
     */
    public function getRequestPrompt()
    {
        return $this->request_prompt;
    }

    /**
     * @return null
     */
    public function getRequestScope()
    {
        return $this->request_scope;
    }

    /**
     * @param null $request_scope
     */
    public function setRequestScope($request_scope)
    {
        $this->request_scope = $request_scope;
    }

    /**
     * @param null $request_prompt
     */
    public function setRequestPrompt($request_prompt)
    {
        $this->request_prompt = $request_prompt;
    }

    /**
     * @return mixed
     */
    public function getResponseOxdNonce()
    {
        if($parts = parse_url($this->getResponseAuthorizationUrl())){
            parse_str($parts['query'], $query);
            return $query['nonce'];
        }else{
            return null;
        }

    }

    /**
     * @return mixed
     */
    public function getResponseOxdClientId()
    {
        if($parts = parse_url($this->getResponseAuthorizationUrl())){
            parse_str($parts['query'], $query);
            return $query['client_id'];
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getResponseOxdClientSecret()
    {
        if($parts = parse_url($this->getResponseAuthorizationUrl())){
            parse_str($parts['query'], $query);
            return $query['client_secret'];
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getResponseOxdRedirectUri()
    {
        if($parts = parse_url($this->getResponseAuthorizationUrl())){
            parse_str($parts['query'], $query);
            return $query['redirect_uri'];
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getResponseOxdScope()
    {
        if($parts = parse_url($this->getResponseAuthorizationUrl())){
            parse_str($parts['query'], $query);
            return $query['scope'];
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getResponseOxdState()
    {
        if($parts = parse_url($this->getResponseAuthorizationUrl())){
            parse_str($parts['query'], $query);
            return $query['state'];
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getResponseResponseType()
    {
        if($parts = parse_url($this->getResponseAuthorizationUrl())){
            parse_str($parts['query'], $query);
            return $query['response_type'];
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getRequestOxdId()
    {
        return $this->request_oxd_id;
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
    public function getRequestAcrValues()
    {
        return $this->request_acr_values;
    }

    /**
     * @param null $request_acr_values
     */
    public function setRequestAcrValues($request_acr_values)
    {
        $this->request_acr_values = $request_acr_values;
    }

    /**
     * @return mixed
     */
    public function getResponseAuthorizationUrl()
    {
        $this->response_authorization_url = $this->getResponseData()->authorization_url;
        return $this->response_authorization_url;
    }

    public function setCommand()
    {
        $this->command = 'get_authorization_url';
    }

    public function setParams()
    {
        $this->params = array(
            "oxd_id" => $this->getRequestOxdId(),
            "acr_values" => $this->getRequestAcrValues(),
            "prompt" => $this->getRequestPrompt(),
            "scope" => $this->getRequestScope(),
            "hd" => $this->getRequestHD()
        );
    }

}