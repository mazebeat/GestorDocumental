<?php namespace Illuminate\Mail\Transport;

use Psr\Log\LoggerInterface;
use Swift_Events_EventListener;
use Swift_Mime_Message;
use Swift_Mime_MimeEntity;
use Swift_Transport;

class LogTransport implements Swift_Transport {

	/**
	 * The Logger instance.
	 *
	 * @var \Psr\Log\LoggerInterface
	 */
	protected $logger;

	/**
	 * Create a new log transport instance.
	 *
	 * @param  \Psr\Log\LoggerInterface  $logger
	 * @return void
	 */
	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	/**
	 * {@inheritdoc}
	 */
	public function isStarted()
	{
		return true;
	}

	/**
	 * {@inheritdoc}
	 */
	public function registerPlugin(Swift_Events_EventListener $plugin)
	{
		//
	}

	/**
	 * {@inheritdoc}
	 */
	public function send(Swift_Mime_Message $message, &$failedRecipients = null)
	{
		$this->logger->debug($this->getMimeEntityString($message));
	}

	/**
	 * {@inheritdoc}
	 */
	public function start()
	{
		return true;
	}

	/**
	 * {@inheritdoc}
	 */
	public function stop()
	{
		return true;
	}

	/**
	 * Get a loggable string out of a Swiftmailer entity.
	 *
	 * @param  \Swift_Mime_MimeEntity $entity
	 * @return string
	 */
	protected function getMimeEntityString(Swift_Mime_MimeEntity $entity)
	{
		$string = (string) $entity->getHeaders().PHP_EOL.$entity->getBody();

		foreach ($entity->getChildren() as $children)
		{
			$string .= PHP_EOL.PHP_EOL.$this->getMimeEntityString($children);
		}

		return $string;
	}

}
