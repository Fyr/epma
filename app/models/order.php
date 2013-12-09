<?
define('ORDER_ERR1', __('Поле обязательно к заполнению', true));
define('ORDER_ERR2', __('Имя должно быть от 3 до 50 символов', true));
define('ORDER_ERR3', __('Некорректный e-mail адрес', true));

class Order extends AppModel {
	var $name = 'Order';

	var $validate = array(
		'username' => array(
			'nonEmpty' => array(
				'rule' => 'notEmpty',
				'message' => ORDER_ERR1
			),
			'between' => array(
				'rule' => array('between', 3, 50),
				'message' => ORDER_ERR2
			)
		),
		'email' => array(
			'nonEmpty' => array(
				'rule' => 'notEmpty',
				'message' => ORDER_ERR1
			),
			'email' => array(
				'rule' => 'email',
				'message' => ORDER_ERR3
			)
		),
		'phone' => array(
			'nonEmpty' => array(
				'rule' => 'notEmpty',
				'message' => ORDER_ERR1
			)
		)
	);


}
