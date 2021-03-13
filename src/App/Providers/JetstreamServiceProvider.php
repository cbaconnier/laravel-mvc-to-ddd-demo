<?php

namespace App\Providers;

use Domain\Team\Actions\AddTeamMemberAction;
use Domain\Team\Actions\CreateTeamAction;
use Domain\Team\Actions\DeleteTeamAction;
use Domain\User\Actions\DeleteUserAction;
use Domain\Team\Actions\InviteTeamMemberAction;
use Domain\Team\Actions\RemoveTeamMemberAction;
use Domain\Team\Actions\UpdateTeamNameAction;
use Domain\User\Models\User;
use Domain\Team\Models\Membership;
use Domain\Team\Models\Team;
use Domain\Team\Models\TeamInvitation;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::useMembershipModel(Membership::class);
        Jetstream::useTeamModel(Team::class);
        Jetstream::useTeamInvitationModel(TeamInvitation::class);


        Jetstream::useUserModel(User::class);


        Jetstream::createTeamsUsing(CreateTeamAction::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamNameAction::class);
        Jetstream::addTeamMembersUsing(AddTeamMemberAction::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMemberAction::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMemberAction::class);
        Jetstream::deleteTeamsUsing(DeleteTeamAction::class);
        Jetstream::deleteUsersUsing(DeleteUserAction::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', __('Administrator'), [
            'create',
            'read',
            'update',
            'delete',
        ])->description(__('Administrator users can perform any action.'));

        Jetstream::role('editor', __('Editor'), [
            'read',
            'create',
            'update',
        ])->description(__('Editor users have the ability to read, create, and update.'));
    }
}
