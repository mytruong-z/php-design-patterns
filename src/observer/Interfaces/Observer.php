<?php

namespace observer\Interfaces;

interface Observer
{
    public function update(Subject $subject): void;

}