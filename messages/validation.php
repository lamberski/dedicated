<?php defined('SYSPATH') or die('No direct script access.');

switch (I18n::lang())
{
	// Polish translation
	case 'pl':
		return array(
			'alpha'             => 'Pole <strong>:field</strong> musi składać się wyłącznie z liter',
			'alpha_dash'        => 'Pole <strong>:field</strong> musi składać się wyłącznie z liter i znaków podkreślenia',
			'alpha_numeric'     => 'Pole <strong>:field</strong> musi składać się wyłącznie z cyfr',
			'color'             => 'Pole <strong>:field</strong> musi być kolorem',
			'credit_card'       => 'Pole <strong>:field</strong> musi być poprawnym numerem karty kredytowej',
			'date'              => 'Pole <strong>:field</strong> musi być datą',
			'decimal'           => 'Pole <strong>:field</strong> musi być liczbą dziesiętną z :param1 miejscami po przecinku',
			'digit'             => 'Pole <strong>:field</strong> musi być cyfrą',
			'email'             => 'Pole <strong>:field</strong> musi być adresem email',
			'email_domain'      => 'Pole <strong>:field</strong> musi posiadać porawną domenę e-mail',
			'equals'            => 'Pole <strong>:field</strong> musi być równe :param1',
			'exact_length'      => 'Pole <strong>:field</strong> musi składać się z dokładnie :param2 znaków',
			'in_array'          => 'Pole <strong>:field</strong> musi być jedną z dostępnych opcji',
			'ip'                => 'Pole <strong>:field</strong> musi być adresem IP',
			'matches'           => 'Pole <strong>:field</strong> musi być takie samo jak <strong>:param3</strong>',
			'min_length'        => 'Pole <strong>:field</strong> musi składać się z przynajmniej :param2 znaków',
			'max_length'        => 'Pole <strong>:field</strong> może składać się z maksymalnie :param2 znaków',
			'not_empty'         => 'Pole <strong>:field</strong> nie może być puste',
			'numeric'           => 'Pole <strong>:field</strong> musi być liczbą',
			'phone'             => 'Pole <strong>:field</strong> musi być numerem telefonu',
			'range'             => 'Pole <strong>:field</strong> musi zawierać się w przedziale od :param2 do :param3',
			'regex'             => 'Pole <strong>:field</strong> nie pasuje do wzorca',
			'url'               => 'Pole <strong>:field</strong> musi być adresem URL',
			'Upload::not_empty' => 'Pole <strong>:field</strong> nie może być puste',
			'Upload::valid'     => 'Plik podany w polu <strong>:field</strong> nie został poprawnie załadowany',
			'Upload::type'      => 'Plik podany w polu <strong>:field</strong> ma nieobsługiwane rozszerzenie',
			'Upload::size'      => 'Plik podany w polu <strong>:field</strong> jest za duży',
		);
	break;

	// Default english translation
	default:
		return array(
			'alpha'             => '<strong>:field</strong> must contain only letters',
			'alpha_dash'        => '<strong>:field</strong> must contain only numbers, letters and dashes',
			'alpha_numeric'     => '<strong>:field</strong> must contain only letters and numbers',
			'color'             => '<strong>:field</strong> must be a color',
			'credit_card'       => '<strong>:field</strong> must be a credit card number',
			'date'              => '<strong>:field</strong> must be a date',
			'decimal'           => '<strong>:field</strong> must be a decimal with :param2 places',
			'digit'             => '<strong>:field</strong> must be a digit',
			'email'             => '<strong>:field</strong> must be a email address',
			'email_domain'      => '<strong>:field</strong> must contain a valid email domain',
			'equals'            => '<strong>:field</strong> must equal :param2',
			'exact_length'      => '<strong>:field</strong> must be exactly :param2 characters long',
			'in_array'          => '<strong>:field</strong> must be one of the available options',
			'ip'                => '<strong>:field</strong> must be an ip address',
			'matches'           => '<strong>:field</strong> must be the same as :param3',
			'min_length'        => '<strong>:field</strong> must be at least :param2 characters long',
			'max_length'        => '<strong>:field</strong> must not exceed :param2 characters long',
			'not_empty'         => '<strong>:field</strong> must not be empty',
			'numeric'           => '<strong>:field</strong> must be numeric',
			'phone'             => '<strong>:field</strong> must be a phone number',
			'range'             => '<strong>:field</strong> must be within the range of :param2 to :param3',
			'regex'             => '<strong>:field</strong> does not match the required format',
			'url'               => '<strong>:field</strong> must be a url',
			'Upload::not_empty' => '<strong>:field</strong> must not be empty',
			'Upload::valid'     => '<strong>:field</strong> was not loaded correctly',
			'Upload::type'      => '<strong>:field</strong> has unsupported extension',
			'Upload::size'      => '<strong>:field</strong> is too big',
		);
}