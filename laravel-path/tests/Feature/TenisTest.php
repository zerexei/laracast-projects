<?php

class Game
{
    protected array $rolls = [];

    const FRAMES_PER_GAME = 10;

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * Determine if the current roll was a strike.
     *
     * @param  int  $roll
     * @return bool
     */
    protected function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

    /**
     * Determine if the current frame was a spare.
     *
     * @param  int  $roll
     * @return bool
     */
    protected function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * Calculate the score for the frame.
     *
     * @param  int  $roll
     * @return int
     */
    protected function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    /**
     * Get the bonus for a strike.
     *
     * @param  int  $roll
     * @return int
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    /**
     * Get the bonus for a spare.
     *
     * @param  int  $roll
     * @return int
     */
    protected function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    /**
     * Get the number of pins knocked down for the given roll.
     *
     * @param  int  $roll
     * @return int
     */
    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}

it('scores_a_gutter_game_as_zero', function () {
    $game = new Game();

    foreach (range(1, 20) as $roll) {
        $game->roll(0);
    }

    expect(0)->toBe($game->score());
});

it('scores_all_ones', function () {
    $game = new Game();

    foreach (range(1, 20) as $roll) {
        $game->roll(1);
    }

    expect(20)->toBe($game->score());
});

it('awards_a_one_roll_bonus_for_every_spare', function () {
    $game = new Game();

    $game->roll(5);
    $game->roll(5); // spare

    $game->roll(8);

    foreach (range(1, 17) as $roll) {
        $game->roll(0);
    }

    expect(26)->toBe($game->score());
});

it('awards_a_two_roll_bonus_for_every_strike', function () {
    $game = new Game();

    $game->roll(10); // strike

    $game->roll(5);
    $game->roll(2);

    foreach (range(1, 16) as $roll) {
        $game->roll(0);
    }

    expect(24)->toBe($game->score());
});

it('spare_on_the_final_frame_grants_one_extra_ball', function () {
    $game = new Game();

    foreach (range(1, 18) as $roll) {
        $game->roll(0);
    }

    $game->roll(5);
    $game->roll(5); // spare

    $game->roll(5);

    expect(15)->toBe($game->score());
});

it('strike_on_the_final_frame_grants_two_extra_balls', function () {
    $game = new Game();

    foreach (range(1, 18) as $roll) {
        $game->roll(0);
    }

    $game->roll(10); // strike

    $game->roll(10);
    $game->roll(10);

    expect(30)->toBe($game->score());
});

it('scores_a_perfect_game', function () {
    $game = new Game();

    foreach (range(1, 12) as $roll) {
        $game->roll(10);
    }

    expect(300)->toBe($game->score());
});
