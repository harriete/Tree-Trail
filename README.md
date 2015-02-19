Tree-Trail
==========

## Development setup

This should be the only things you need to do to get a minimum setup.

1. Install the following software:
    
    - [XAMPP](https://www.apachefriends.org/download.html)
    - [NodeJS](http://nodejs.org/download/) appropriate for your system.
    - [Git](https://msysgit.github.io/)

2. Fork the repository on Github. On the main repo, click on "Fork" on the top right.

3. Clone your fork of the repository:
   
    ```shell
    # Usually C:\XAMPP\htdocs or D:\XAMPP\htdocs, depending on where you placed it
    cd [/path/to/your/XAMPP/htdocs] 
    git clone https://github.com/[your username]/Tree-Trail.git
    ```

   It will ask for your Github username and password *but the password will not print on the terminal*. Just provide accordingly.
   
4. Stop Apache. Locate the file called `httpd.conf` inside your XAMPP installation. In that file, look for `DocumentRoot`. It should have `C:/XAMPP/htdocs` by default. Append `/Tree-Trail/php` to it. It should now be `C:/XAMPP/htdocs/Tree-Trail/php`

5. Add the following environment variables and values to your system:

    - `OPENSHIFT_MYSQL_DB_HOST` : `localhost`
    - `OPENSHIFT_MYSQL_DB_PORT` : `3306`
    - `OPENSHIFT_MYSQL_DB_USERNAME` : whatever user you use on your local machine
    - `OPENSHIFT_MYSQL_DB_PASSWORD` : whatever password you provided to that local user
    - `OPENSHIFT_MYSQL_DB_NAME` : whatever name you provided your local database
    - `OPENSHIFT_SECRET_TOKEN` : a random 32-character string for encryption purposes
    
    These values are specific to your local machine. During deployment to the server, the server will use *its own values* for these, ensuring that your db passwords will stay yours, while the server passwords stays with it.

6. Go to the `Tree-Trail/php/static` directory and run this:

    ```shell
    npm install
    ```

7. Start Apache and visit `http://localhost/init_db`. This page should contain instructions on setting up your db.

## Contributing code

### Fork the repo

At the top right of the repo page should be a "Fork" button. Click that and this repository will be "photocopied" to your Github account. Now you have a copy of the original repo.

### Getting a copy for the first time (like in step 2 above)

```shell
cd [/path/to/your/XAMPP/htdocs] 
git clone https://github.com/[your username]/Tree-Trail.git
```

- **mybranch** - Your "branch" of the project where you can play around. Name it after what you are working on.
- **origin/development** - The branch where you want to base off your branch

Copying to your local machine is done only once. Getting changes and putting them to your local, we use `git fetch`

### Getting further updates

Just do this once, add the main repo into your local machine

```shell
git remote add upstream https://github.com/fskreuz/Tree-Trail.git
```

Now every time you want to get updates from the main repo, do this:

```shell
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

```shell
git add path/to/file/you/want/added
```

You can select whatever file you need to stage. you may even leave out some files. Now, in order for those staged files to be committed to history, do:

```shell
git commit -m "MESSAGE HERE"
```

Replace `MESSAGE HERE` with a meaningful message describing your changes.

### Sharing your changes

```shell
git push origin mybranch
```

This pushes your branch

### Inform others

When pushing your branch changes to the repository, inform others about your changes so that they can review your code before putting it into the release branch.
