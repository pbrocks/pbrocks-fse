# How to have specific .gitignore for each git branch

## Objective

My objective is to have some production files ignored on specific branches. Git doesn't allow to do it.

## Solution

My solution is to make a general `.gitignore` file and add `.gitignore.branch_name` files for the branches I want to add specific file exclusion.
I'll use post-checkout hook to copy those `.gitignore.branch_name in place` of `.git/info/exclude` each time I go to the branch with `git checkout branch_name`.

## Steps

1. Create new `.gitignore` files for each branch and name it like this : `.gitignore.branch_name`
2. In your git repo, go to `.git/hooks/`
3. Edit or create `post-checkout` file and copy the content found in this gist.
4. Don't forget to make it executable with `chmod 755 post-checkout`
5. Just go to the branch you want and type `git status`: TADAAA !
