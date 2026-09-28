# Contribution Guide

Thank you for your interest in contributing to this project!

Since this is a very personal project (it is my own personal landing page and blog, after all), I generally am not interested in contributions with changes such as design/layout/content updates. I will, however, review contributions that involve bug fixes or code refactors, as well as updates for dependencies (especially if they're security-related).

## What to Contribute

I will review and consider merging:
- Bug fixes in the front-end or back-end code.
- Updates to any code in the `app/` directory.
- Updates/additions to tests in the `tests/` directory.
- Updates to non-project files such as dev environment config, deploy scripts, etc.

I will not accept direct contributions for:
- New or significant updates to existing content (such as blog posts, images, etc.).
- Front-end redesigns or layout changes to the user-facing templates that could not otherwise be considered a bug fix.

Contact me ahead of time about:
- Small content changes such as fixing typos.
- Suggestions for UI/UX changes or design updates.

For the latter category, I'm happy to have discussions on changes you'd like to propose, but due to the different licensing I cannot accept direct contributions that modify content. If you'd like to let me know of small changes such as typos, I will make the change myself, and if it's a change made under source control, credit you in the commit.

## Submitting Contributions

This repository is mainly hosted on my own server without open registration, so I prefer to receive patches via email at `patches@dev.mervyn.online`. I will try to occasionally check for opened pull/merge requests across mirrors that I control, so if you are unable to submit email patches I will hopefully see your request elsewhere to review/apply it. If you open a PR and don't see a response for a significant amount of time, feel free to separately reach out to me to let me know I may have missed it!

## Contribution Sizes

Please keep your patches reasonable in size. For dependency updates that result in massive lockfile changes I understand that's somewhat avoidable, but please don't submit a single patch that addresses multiple unrelated issues or otherwise adds/modifies/remove significant amounts of code. I would much prefer multiple smaller patches with a limited and focused scope.

## AI Guidelines

Please don't. If your IDE provides local-only limited code generation such as single-line completion, that's a bit more acceptable (and not something I could likely pick out anyway), but I _do_ manually review everything and any large chunks of obviously-generated slop will be rejected.
