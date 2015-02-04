Tree-Trail
==========

## TL;DR (Too long; Didn't Read)

- If you're looking for the PHP code for our system, it's under `php`.
- This is the file layout for OpenShift PaaS (read: our hosting platform). Don't worry, step 3 below will make `http://localhost` point to `Tree-Trail/php`. That way you won't be doing `http://localhost/Tree-Trail/php/whatever` and ruin base urls.

## Development setup

1. Install the following software:
    
    - [XAMPP](https://www.apachefriends.org/download.html)
    - NodeJS
        - For Windows users, just [download the msi installer](http://nodejs.org/download/) appropriate for your system.
        - For Linux users, [install via your respective package managers.](https://github.com/joyent/node/wiki/installing-node.js-via-package-manager).
    - Git
        - For Windows users, [install msysGit](https://msysgit.github.io/)
        - For Linux users, install via your respective package managers.

2. Fork the repository on Github and clone your fork of the repository:
   
    ```
    # Usually on Windows, path is C:\XAMPP\htdocs or D:\XAMPP\htdocs depending on where you installed
    # Linux users usually have it in /opt/lampp/htdocs
    cd [/path/to/your/XAMPP/htdocs] 
    git clone https://github.com/[your username]/Tree-Trail.git
    ```

   It will ask for your Github username and password. Just provide accordingly.
   
3. Locate the file called `httpd.conf` inside the `etc` directory of your XAMPP installation. In that file, look for `DocumentRoot` and **append** to it:
    
    - Windows: `\Tree-Trail\php`
    - Linux: `/Tree-Trail/php`
    
    This will make `http://localhost` point to the project's root, instead of everything in `htdocs`, making the `localhost` domain entirely for Tree-Trail

4. Add the following environment variables and values to your system:

    - `OPENSHIFT_MYSQL_DB_HOST` : `localhost`
    - `OPENSHIFT_MYSQL_DB_PORT` : `3306`
    - `OPENSHIFT_MYSQL_DB_USERNAME` : whatever user you use on your local machine
    - `OPENSHIFT_MYSQL_DB_PASSWORD` : whatever password you provided to that local user
    - `OPENSHIFT_MYSQL_DB_NAME` : whatever name you provided your local database
    
    These values are specific to your local machine. During deployment to the server, the server will use *its own values* for these, ensuring that your db passwords will stay yours, while the server passwords stays with it.

5. Go to the `Tree-Trail/php/static` directory and run this:

    ```
    npm install
    ```
    
    This will download libraries needed for the project (jQuery, Leaflet, etc.) because in the real world, you don't commit libraries into your project.

6. TODO: Include initial DB dump to repo and add import/export instructions.

## Running

Run XAMPP 

- On Windows, start Apache and MySQL using the XAMPP Control Panel
- On Linux, you can do `sudo /path/to/lampp start`

Once running, visit `http://localhost/`. You know when its working whegn you see a map and a sidebar.

## Contributing code

### Fork the repo

At the top right of the repo page should be a "Fork" button. Click that and this repository will be "photocopied" to your Github account. Now you have a copy of the original repo.

### Getting a copy for the first time (like in step 2 above)

```
cd [/path/to/your/XAMPP/htdocs] 
git clone https://github.com/[your username]/Tree-Trail.git
```

- **mybranch** - Your "branch" of the project where you can play around. Name it after what you are working on.
- **origin/development** - The branch where you want to base off your branch

Copying to your local machine is done only once. Getting changes and putting them to your local, we use `git fetch`

### Getting further updates

Just do this once, add the main repo into your local machine

```
git remote add upstream https://github.com/fskreuz/Tree-Trail.git
```

Now every time you want to get updates from the main repo, do this:

```
git fetch upstream
git rebase upstream/development mybranch
```

- **fetch** - The command to download changes from the repository
- **origin** - The repository where we get the changes (in this case, *this* GitHub repo)
- **rebase** - The command to put in changes from the repository to your local copy
- **origin/development** - The branch of the repository where to get changes from
- **mybranch** - The branch you want to put in the changes.

Rebase works by taking the repository changes and putting your changes on top of it, hence "rebase" (put remote changes as base of your changes).

### Committing changes

Once you have made your changes in the code, your code will need to be put to the "staging area". In order to do that, for each file do:

```
git add path/to/file/you/want/added
```

You can select whatever file you need to stage. you may even leave out some files. Now, in order for those staged files to be committed to history, do:

```
git commit -m "MESSAGE HERE"
```

Replace `MESSAGE HERE` with a meaningful message describing your changes.

### Sharing your changes

```
git push origin mybranch
```

This pushes your branch

### Inform others

When pushing your branch changes to the repository, inform others about your changes so that they can review your code before putting it into the release branch.
