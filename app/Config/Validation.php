<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use Myth\Auth\Authentication\Passwords\ValidationRules;


class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		ValidationRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $create = [
		'inputName' => [
			'rules' => 'required|max_length[15]|alpha_space|is_unique[projects.Name]',
			'errors' => [
				'max_length' => "Please try a short name within 15 characters. ",
                'required' => 'Project Name is required. ',
                'alpha_space' => 'Sorry! The name can only be a combination of alphabetic characters and spaces',
				'is_unique' => 'Please use a different name. Project already exists with this name. '
			]
		],
		'inputDescription' => [
			'rules' => 'required',
            'errors' => [
                'required' => 'Project Description is required. '
            ]
		],
		'inputStatus' => [
			'rules' => 'required',
            'errors' => [
                'required' => 'Project Status is required '
            ]
		],
		'inputClientCompany' => [
			'rules' => 'required|min_length[3]',
			'errors' => [
				'min_length' => 'Please enter a valid Company Name. ',
                'required' => 'Client Company is required. '
			]
		],
		'inputProjectLeader' => [
			'rules' => 'required|min_length[3]',
			'errors' => [
				'min_length' => 'Please provide a valid name. ',
                'required' => 'Project Leader is required. '
			]
		],
		'inputEstimatedBudget' => [
			'rules' => 'required|is_natural',
			'errors' => [
				'is_natural' => 'Only numbers are allowed here...',
                'required' => 'Please provide Budget of the project. '
			]
		],
		'inputTotalSpent' => [
			'rules' => 'required|is_natural_no_zero',
			'errors' => [
				'is_natural_no_zero' => 'Only numbers are allowed here...',
                'required' => 'Please provide the Expenditure of project '
			]
        ],
        'inputEstimatedDuration' => [
            'rules' => 'required|is_natural_no_zero',
            'errors' => [
				'is_natural_no_zero' => 'Only numbers are allowed here...',
                'required' => 'How much time will the project take? '
			]
        ]
	];

	public $edit = [
		'inputName' => [
			'rules' => 'required|max_length[15]|alpha_space',
			'errors' => [
				'max_length' => "Please try a short name within 15 characters. ",
                'required' => 'Project Name is required. ',
                'alpha_space' => 'Sorry! The name can only be a combination of alphabetic characters and spaces'
			]
		],
		'inputDescription' => [
			'rules' => 'required',
            'errors' => [
                'required' => 'Project Description is required. '
            ]
		],
		'inputStatus' => [
			'rules' => 'required',
            'errors' => [
                'required' => 'Project Status is required '
            ]
		],
		'inputClientCompany' => [
			'rules' => 'required|min_length[3]',
			'errors' => [
				'min_length' => 'Please enter a valid Company Name. ',
                'required' => 'Client Company is required. '
			]
		],
		'inputProjectLeader' => [
			'rules' => 'required|min_length[3]',
			'errors' => [
				'min_length' => 'Please provide a valid name. ',
                'required' => 'Project Leader is required. '
			]
		],
		'inputEstimatedBudget' => [
			'rules' => 'required|is_natural',
			'errors' => [
				'is_natural' => 'Only numbers are allowed here...',
                'required' => 'Please provide Budget of the project. '
			]
		],
		'inputTotalSpent' => [
			'rules' => 'required|is_natural_no_zero',
			'errors' => [
				'is_natural_no_zero' => 'Only numbers are allowed here...',
                'required' => 'Please provide the Expenditure of project '
			]
        ],
        'inputEstimatedDuration' => [
            'rules' => 'required|is_natural_no_zero',
            'errors' => [
				'is_natural_no_zero' => 'Only numbers are allowed here...',
                'required' => 'How much time will the project take? '
			]
        ]
	];

	public $login = [
		'email' => [
			'rules' => 'required|min_length[10]|valid_email',
			'errors' => [
				'valid_email' => 'Please choose a valid email. ',
				'required' => 'Email is required. '
			]
		],
		'password' => [
			'rules' => 'required|min_length[10]',
			'errors' => [
				'min_length[10]' => 'Password should be atleast 10 characters'
			]
		]

	];
}
