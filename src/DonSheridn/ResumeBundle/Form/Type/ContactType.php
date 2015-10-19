<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 8/27/2015
 * Time: 1:37 PM
 */

// src/AppBundle/Form/Type/PersonType.php
namespace DonSheridn\ResumeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', 'text', array(
                    'attr' => array(
                        'id' => 'subject'
                    )
                )
            )
            ->add('message', 'textarea', array(
                    'attr' => array(
                        'id' => 'message'
                    ),
                    'label' => 'Your Message'
                )
            )
            ->add('email', 'email', array(
                    'attr' => array(
                        'id' => 'email'
                    ),
                    'label' => 'Email Address'
                )
            )
            ->add('first_name', 'text', array(
                    'attr' => array(
                        'id' => 'first_name'
                    ),
                    'label' => 'First Name'
                )
            )
            ->add('last_name', 'text', array(
                    'attr' => array(
                        'id' => 'last_name'
                    ),
                    'label' => 'Last Name'
                )
            )
            ->add('state', 'choice', array(
                    'choices' => array(
                        'AL'=>'ALABAMA',
                        'AK'=>'ALASKA',
                        'AS'=>'AMERICAN SAMOA',
                        'AZ'=>'ARIZONA',
                        'AR'=>'ARKANSAS',
                        'CA'=>'CALIFORNIA',
                        'CO'=>'COLORADO',
                        'CT'=>'CONNECTICUT',
                        'DE'=>'DELAWARE',
                        'DC'=>'DISTRICT OF COLUMBIA',
                        'FM'=>'FEDERATED STATES OF MICRONESIA',
                        'FL'=>'FLORIDA',
                        'GA'=>'GEORGIA',
                        'GU'=>'GUAM GU',
                        'HI'=>'HAWAII',
                        'ID'=>'IDAHO',
                        'IL'=>'ILLINOIS',
                        'IN'=>'INDIANA',
                        'IA'=>'IOWA',
                        'KS'=>'KANSAS',
                        'KY'=>'KENTUCKY',
                        'LA'=>'LOUISIANA',
                        'ME'=>'MAINE',
                        'MH'=>'MARSHALL ISLANDS',
                        'MD'=>'MARYLAND',
                        'MA'=>'MASSACHUSETTS',
                        'MI'=>'MICHIGAN',
                        'MN'=>'MINNESOTA',
                        'MS'=>'MISSISSIPPI',
                        'MO'=>'MISSOURI',
                        'MT'=>'MONTANA',
                        'NE'=>'NEBRASKA',
                        'NV'=>'NEVADA',
                        'NH'=>'NEW HAMPSHIRE',
                        'NJ'=>'NEW JERSEY',
                        'NM'=>'NEW MEXICO',
                        'NY'=>'NEW YORK',
                        'NC'=>'NORTH CAROLINA',
                        'ND'=>'NORTH DAKOTA',
                        'MP'=>'NORTHERN MARIANA ISLANDS',
                        'OH'=>'OHIO',
                        'OK'=>'OKLAHOMA',
                        'OR'=>'OREGON',
                        'PW'=>'PALAU',
                        'PA'=>'PENNSYLVANIA',
                        'PR'=>'PUERTO RICO',
                        'RI'=>'RHODE ISLAND',
                        'SC'=>'SOUTH CAROLINA',
                        'SD'=>'SOUTH DAKOTA',
                        'TN'=>'TENNESSEE',
                        'TX'=>'TEXAS',
                        'UT'=>'UTAH',
                        'VT'=>'VERMONT',
                        'VI'=>'VIRGIN ISLANDS',
                        'VA'=>'VIRGINIA',
                        'WA'=>'WASHINGTON',
                        'WV'=>'WEST VIRGINIA',
                        'WI'=>'WISCONSIN',
                        'WY'=>'WYOMING',
                        'AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
                        'AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)',
                        'AP'=>'ARMED FORCES PACIFIC'
                    ),
                    'required' => true,
                    'attr' => array(
                        'id' => 'state'
                    )

                )
            )
            ->add('zip', 'text', array(
                    'attr' => array(
                        'id' => 'zip'
                    ),
                    'label' => 'Zip Code'
                )
            )
            ->add('phone', 'integer', array(
                    'attr' => array(
                        'id' => 'phone'
                    ),
                    'label' => 'Phone Number'
                )
            )
//            ->add('submit', 'submit', array(
//                    'attr' => array(
//                        'id' => 'submit'
//                    )
//                )
//            )


//            ->add('reset', 'reset', array(
//                    'attr' => array(
//                        'id' => 'reset'
//                    )
//                )
//            )
        ;
    }

    public function getName()
    {
        return 'member_form';
    }

//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => 'DonSheridn\ResumeBundle\Entity\ContactPerson'
//        ));
//    }

}