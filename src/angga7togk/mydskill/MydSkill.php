<?php

namespace angga7togk\mydskill;

use angga7togk\mydskill\i18n\MSLang;
use angga7togk\mydskill\utils\Utils;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class MydSkill extends PluginBase
{

  use SingletonTrait;

  private MSLang $lang;

  public function onLoad(): void
  {
    self::setInstance($this);
  }

  public function onEnable(): void
  {
    $this->saveDefaultConfig();
  }

  private function loadResources(): void
  {
    $this->saveDefaultConfig();

    $oldLanguageDir = $this->getDataFolder() . "language";
    if (file_exists($oldLanguageDir)) {
      Utils::unlinkRecursive($oldLanguageDir);
    }

    $resources = $this->getResources();
    foreach ($resources as $resource) {
      $fileName = $resource->getFileName();
      $extension = Utils::getFileExtension($fileName);

      if ($extension !== MSLang::LANGUAGE_EXTENSION) continue;

      $lang = new MSLang($resource);
      $this->getLogger()->debug("Loaded language file: {$lang->getLang()}.ini");
    }
    MSLang::setConsoleLocale($this->getConfig()->get('language', 'en_us'));
    $this->lang = MSLang::fromConsole();
    $message = $this->lang->translateString("language.selected", [
      $this->lang->getName(),
      $this->lang->getLang(),
    ]);
    $this->getLogger()->info($message);
  }
}
