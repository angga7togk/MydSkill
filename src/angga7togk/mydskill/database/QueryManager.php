<?php

namespace angga7togk\mydskill\database;

use angga7togk\mydskill\MydSkill;

final class QueryManager
{
  private static string $table;
  private static bool $isMySQL;

  public static function init(string $table, bool $isMySQL): void
  {
    QueryManager::$table = $table;
    QueryManager::$isMySQL = $isMySQL;
  }
}
