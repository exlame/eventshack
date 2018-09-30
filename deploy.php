<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'eventshack');

// Project repository
set('repository', 'git@github.com:exlame/eventshack.git');

set('bin/composer', function () {
   return '/usr/bin/composer';
});

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', ['env.php']);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

host('eventshack.wshost.ca')
    ->user('eventshack')
    ->set('deploy_path', '~/apps/eventshack/public');    
    

task('deploy:htaccess', function () {
    upload('server/.htaccess', '{{deploy_path}}/');
});


// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:htaccess',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
