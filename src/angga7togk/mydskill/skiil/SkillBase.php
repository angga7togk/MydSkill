<?php

namespace angga7togk\mydskill\skill;

class SkillBase {

    public function __construct(
      private readonly string $id,
      private readonly string $name,
      
    ) {

    }
}