<?php
/**
 * Created by PhpStorm.
 * User: toni
 * Date: 10.9.17
 * Time: 20:37
 */

class ApiResponse implements JsonSerializable {

    /**
     * @var string
     */
    private $status = '';

    /**
     * @var string
     */
    private $message = '';

    /**
     * @var array
     */
    private $data = [];

    /**
     * ApiResponse constructor.
     * @param string $status
     * @param string $message
     * @param $data
     */
    public function __construct(string $status, string $message, $data)
    {
        $this->setStatus($status);
        $this->setMessage($message);
        $this->setData($data);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'status' => $this->getStatus(),
            'message' => $this->getMessage(),
            'data' => $this->getData(),
        ];
    }
}


$api = new ApiResponse('success', 'You success insert new into database', []);
