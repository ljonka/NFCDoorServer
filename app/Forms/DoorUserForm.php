<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Door;
use App\DoorUser;
use App\DoorUserGrant;

class DoorUserForm extends Form
{
    public function buildForm()
    {
        $selected = [];
        if(isset($this->data['user'])){
          $user = $this->data['user'];
          $grants = DoorUserGrant::where('door_user', '=', $user->id)->get();
          foreach($grants as $grant){
            $selected[] = $grant->door;
          }
        }
        $doors = Door::all();
        $choices = [];
        foreach($doors as $door){
          $choices[$door->id] = $door->name;
        }
        $this->add('permissions', 'choice', [
          'choices' => $choices,
          'choice_options' => [
              //'wrapper' => ['class' => 'choice-wrapper'],
              'label_attr' => ['class' => 'label-class'],
          ],
          'selected' => $selected,
          'expanded' => true,
          'multiple' => true
        ]);
        $this
            ->add('chip_uuid', 'text', ['rules' => 'required'])
            ->add('name', 'text', ['rules' => 'required'])
            ->add('phone', 'text', ['rules' => 'required'])
            ->add('email', 'email', ['rules' => 'required'])
            ->add('note', 'text', ['rules' => 'required'])
            ->add('submit', 'submit', ['label' => 'save']);

    }
}
