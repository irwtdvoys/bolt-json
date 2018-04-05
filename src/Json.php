<?php
	namespace Bolt;

	use Bolt\Exceptions\Json as Exception;

	class Json
	{
		public $data = null;

		public function __construct($data = null)
		{
			$this->data = $data;

			if (is_string($data))
			{
				try
				{
					$this->data = self::decode($data);
				}
				catch (\Exception $exception)
				{
				}
			}
		}

		public function toString()
		{
			return self::encode($this->data);
		}

		public static function encode($data)
		{
			$result = json_encode($data);

			$error = json_last_error();

			if ($error !== JSON_ERROR_NONE)
			{
				throw new Exception("Error encoding JSON", $error);
			}

			return $result;
		}

		public static function decode($data)
		{
			$result = json_decode($data);

			$error = json_last_error();

			if ($error !== JSON_ERROR_NONE)
			{
				throw new Exception("Error decoding JSON", $error);
			}

			return $result;
		}
	}
?>
