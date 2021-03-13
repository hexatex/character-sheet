<?php

/**
 * Class Character
 * https://www.d12dungeonchronicles.com/post/dnd-5ed-character-sheets-fully-explained
 * I stopped last in the "Armor Class (AC):" section of the link above^
 */
class Character extends Model
{
    /** @var string|null */
    protected $name;

    /** @var int **/
    protected $strength = 0;

    /** @var int **/
    protected $dexterity = 0;

    /** @var int **/
    protected $constitution = 0;

    /** @var int **/
    protected $intelligence = 0;

    /** @var int **/
    protected $wisdom = 0;

    /** @var int **/
    protected $charisma = 0;

    /** @var CharacterClass[] */
    protected $characterClasses = [];

    /** @var Race|null */
    protected $race;

    /** @var Background|null */
    protected $background;

    /** @var Alignment|null */
    protected $alignment;

    /** @var int */
    protected $experiencePoints = 0;

    /** @var Level|null */
    protected $level;

    /** @var Inspiration|null */
    protected $inspiration;

    /** @var ProficiencyBonus[] */
    protected $proficiencyBonuses = [];

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): void
    {
        $this->dexterity = $dexterity;
    }

    public function getConstitution(): int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): void
    {
        $this->constitution = $constitution;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    public function getWisdom(): int
    {
        return $this->wisdom;
    }

    public function setWisdom(int $wisdom): void
    {
        $this->wisdom = $wisdom;
    }

    public function getCharisma(): int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): void
    {
        $this->charisma = $charisma;
    }

    /**
     * @return CharacterClass[]
     */
    public function getCharacterClasses(): array
    {
        return $this->characterClasses;
    }

    public function addCharacterClass(CharacterClass $characterClass): void
    {
        $this->characterClasses[$characterClass->getCode()] = $characterClass;
    }

    public function removeCharacterClass(CharacterClass $characterClass): void
    {
        unset($this->characterClasses[$characterClass->getCode()]);
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(Race $race): void
    {
        $this->race = $race;
    }

    public function getBackground(): ?Background
    {
        return $this->background;
    }

    public function setBackground(Background $background): void
    {
        $this->background = $background;
    }

    public function getAlignment(): ?Alignment
    {
        return $this->alignment;
    }

    public function setAlignment(Alignment $alignment): void
    {
        $this->alignment = $alignment;
    }

    public function getExperiencePoints()
    {
        return $this->experiencePoints;
    }

    public function incrementExperiencePoints(int $i): int
    {
        $this->experiencePoints = $this->experiencePoints + $i;

        return $this->experiencePoints;
    }

    public function decrementExperiencePoints(int $i): int
    {
        $this->experiencePoints = max(0, $this->experiencePoints - $i);

        return $this->experiencePoints;
    }

    public function getLevel(): Level
    {
        return $this->level;
    }

    public function setLevel(Level $level): void
    {
        $this->level = $level;
    }

    public function getInspiration(): ?Inspiration
    {
        return $this->inspiration;
    }

    public function setInspiration(Inspiration $inspiration): void
    {
        $this->inspiration = $inspiration;
    }

    /**
     * @return ProficiencyBonus[]
     */
    public function getProficiencyBonuses(): array
    {
        return $this->proficiencyBonuses;
    }

    public function addProficiencyBonus(ProficiencyBonus $proficiencyBonus): void
    {
        $this->proficiencyBonuses[$proficiencyBonus->getCode()] = $proficiencyBonus;
    }

    public function removeProficiencyBonus(ProficiencyBonus $proficiencyBonus): void
    {
        unset($this->proficiencyBonuses[$proficiencyBonus->getCode()]);
    }
}
