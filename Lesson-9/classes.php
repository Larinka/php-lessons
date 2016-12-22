<?php

    class Human
    {
        public $tiredness;
        public $happiness;
        public $hunger;
        public $experience;
        public $energy;

        public function walk() {
            if ($this->tiredness < 10) {
                $this->energy = 100;
                return true;
            }
            return false;
        }

        public function eat() {
            if ($this->hunger < 40) {
                $this->happiness = 100;
                return 'Вы не голодны';
            } elseif ($this->hunger > 90) {
                  $this->happiness = 10;
                  return 'Срочно поешьте!';
              }
              return 'Было бы неплохо перекусить';
        }

        public function sleep() {
            if ($this->tiredness > 90) {
                $this->energy = 10;
                return true;
            }
            return false;
        }

        public function work() {
            if ($this->tiredness < 20) {
                return true;
            }
            return false;
            if ($this->experience < 20) {
                return 'Вы плохо работаете';
            } elseif ($this->experience > 80 ) {
                  return 'Вы хорошо работаете';
              }
              return 'Вы нормально работаете';
        }

        public function rest() {
          if ($this->tiredness > 80) {
              $this->happiness < 20;
              return 'Вам срочно нужен отдых';
          } elseif ($this->tiredness < 10) {
                $this->happiness = 100;
                return 'Отдых не требуется';
            }
            return 'Было бы неплохо отдохнуть';
        }
    }
