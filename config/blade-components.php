<?php

use App\View\Components;

return [
    'components' => [
        'text' => [
            'class' => Components\Text::class,
            'themes' => [
                'default' => 'text-[16px]/[20px] md:text-base/[22px]',
                'label' => 'text-[10px]/[15px] md:text-[11px]/[15px] font-bold pt-[3px] tracking-[2px] uppercase mb-1 block',
                'h1' => 'uppercase relative m-0 p-0 text-[38px] md:text-7xl leading-none font-black',
                'h2' => 'uppercase relative m-0 p-0 text-[32px] md:text-5xl leading-none font-black',
                'h3' => 'uppercase relative m-0 p-0 text-[28px] leading-[30px] md:text-[32px] md:leading-10 font-black',
                'h4' => 'uppercase relative m-0 p-0 text-xl leading-[22px] md:text-[22px] md:leading-[30px] font-black',
                'h5' => 'uppercase relative m-0 p-0 text-sm',
                'h6' => 'uppercase relative m-0 p-0 text-sm',
                'subtitle' => [
                    'default' => '',
                    'center' => '',
                ],
            ],
        ],
        'button' => [
            'class' => Components\Button::class,
            'themes' => [
                'primary' => 'flex items-center justify-center gap-2.5 whitespace-nowrap sm:text-2xl text-xl font-bold border-2 px-10 sm:py-[15px] py-3 relative z-10 overflow-hidden after:absolute after:right-0 after:top-0 after:bottom-0 after:z-[-1] after:w-full after:transition-all after:duration-500 hover:after:w-0 transition-all duration-500 after:left-0 after:bg-white text-background border-white hover:text-white mt-6 md:mt-0',
                'outline' => 'magnetic-link text-white flex items-center justify-center gap-2.5 whitespace-nowrap sm:text-2xl text-xl font-bold border-2 border-white px-10 sm:py-[15px] py-3 relative overflow-hidden after:absolute after:right-0 after:bottom-0 after:top-0 after:z-[-1] after:bg-white after:w-0 after:transition-all after:duration-500 hover:after:w-full hover:text-background transition-all duration-500',
            ],
        ],
        'form' => [
            'class' => Components\Form::class,
            'field' => [
                'class' => Components\Form\Field::class,
                'themes' => [
                    'default' => '',
                ],
            ],
            'input' => [
                'class' => Components\Form\Input::class,
                'themes' => [
                    'default' => [
                        'normal' => 'placeholder:text-white text-white px-[15px] py-[14px] outline-none border-[2px] border-white w-full bg-transparent mb-[13px]',
                        'multiple' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'label' => [
                'class' => Components\Form\Label::class,
                'themes' => [
                    'default' => 'mb-2.5 inline-block uppercase text-[11px] font-semibold tracking-[2px] leading-[15px] pt-[3px]',
                ],
            ],
            'legend' => [
                'class' => Components\Form\Legend::class,
                'themes' => [
                    'default' => '',
                ],
            ],
            'radio' => [
                'class' => Components\Form\Radio::class,
                'themes' => [
                    'default' => [
                        'normal' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'select' => [
                'class' => Components\Form\Select::class,
                'themes' => [
                    'default' => [
                        'normal' => '',
                        'multiple' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'textarea' => [
                'class' => Components\Form\Textarea::class,
                'themes' => [
                    'default' => [
                        'normal' => 'placeholder:text-white text-white px-[15px] py-[14px] outline-none border-[2px] border-white w-full bg-transparent min-h-[223px] mb-[13px]',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'checkbox' => [
                'class' => Components\Form\Checkbox::class,
                'themes' => [
                    'default' => [
                        'normal' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'error' => [
                'class' => Components\Form\Error::class,
                'themes' => [
                    'default' => "opacity-100 text-[10px] font-semibold uppercase border bg-[red] text-[white] list-none opacity-0 mx-0 -mt-[5px] pl-[3px] pr-0  pb-0 border-solid border-[red] before:content-[''] before:block before:mt-[-9px] before:pointer-events-none before:absolute before:border-b-[solid] before:border-b-[red] before:border-x-[solid] before:border-x-transparent",
                ],
            ],
        ],
        'menu' => [
            'class' => Components\Menu::class,
            'themes' => [
                'default' => 'w-full m-0 p-0 ',
                'submenu' => 'w-full m-0 p-0 sub-menu max-h-0 overflow-hidden duration-300 ease-in-out pl-5',
            ],
        ],
        'menu-item' => [
            'class' => Components\MenuItem::class,
            'themes' => [
                'default' => 'duration-300 ease-in-out hover:text-main uppercase text-[34px]  font-semibold tracking-[2px] leading-[15px] text-main list-none py-2.5 last:mb-0 ',
                'submenu' => 'duration-300 ease-in-out hover:text-main uppercase text-[11px] font-semibold tracking-[2px] leading-[15px] text-main list-none py-2.5 last:mb-0 ',
            ],
        ],
    ],
];
