<?php

namespace Domain\Team\Actions;

use Laravel\Jetstream\Contracts\DeletesTeams;

class DeleteTeamAction implements DeletesTeams
{
    /**
     * Delete the given team.
     *
     * @param  mixed  $team
     * @return void
     */
    public function delete($team)
    {
        $team->purge();
    }
}
