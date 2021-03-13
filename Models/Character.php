<?php

/**
 * Class Character
 * https://www.d12dungeonchronicles.com/post/dnd-5ed-character-sheets-fully-explained
 */
class Character extends Model
{
    const ARMOR_CLASS = 10;

    /** @var string|null */
    protected $name;

    /** @var AbilityScore[] */
    protected $abilityScores;

    /** @var CharacterClass[]|Collection|null */
    protected $characterClasses;

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

    public function addAbility(AbilityScore $abilityScore): void
    {
        $this->abilityScores[$abilityScore->getAbility()] = $abilityScore;
    }

    /**
     * @param Abilities|int $ability
     * @return AbilityScore|null
     */
    public function getAbility(int $ability): ?AbilityScore
    {
        return $this->abilityScores[$ability] ?? null;
    }

    /**
     * @return CharacterClass[]
     */
    public function getCharacterClasses(): array
    {
        if ($this->characterClasses === null) {
            $this->characterClasses = new Collection;
        }

        return $this->characterClasses;
    }

    public function addCharacterClass(CharacterClass $characterClass): void
    {
        $this->getCharacterClasses()[$characterClass->getCode()] = $characterClass;
    }

    public function removeCharacterClass(CharacterClass $characterClass): void
    {
        unset($this->getCharacterClasses()[$characterClass->getCode()]);
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

    public function getArmorClass(): int
    {
        if (isset($this->abilityScores[Abilities::dexterity])) {
            return self::ARMOR_CLASS + $this->abilityScores[Abilities::dexterity]->getModifier();
        }

        return self::ARMOR_CLASS;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function rollInitiative(): int
    {
        if (isset($this->abilityScores[Abilities::dexterity])) {
            return $this->roll(Dice::d20) + $this->abilityScores[Abilities::dexterity]->getModifier();
        }

        return $this->roll(Dice::d20);
    }

    public function getHitPoints(): int
    {
        $hitPoints = (int)$this->characterClasses->max('getHitPoints');

        return $hitPoints;
    }

    /*
     * Private
     */
    /**
     * @param Dice|int $die
     * @return int
     * @throws Exception
     */
    public function roll(int $die): int
    {
        return random_int(1, $die);
    }
}
