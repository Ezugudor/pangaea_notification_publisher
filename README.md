# Raffle Draw Backend (API)

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Raffle Draw RESTFUL api project built with Laravel/Lumen framework. Started and completed within few weeks and observing the SOLID principle (or should I say Quasi SOLID Principle...lol).

## Features:
- Ticket Management - Purchase, track,etc
- Ticket Pool Shuffling - Only tickets within a given session/ campaign.
- Ticket Drawing - Randomly select/pick winners from the pool (per session / campaign).
- Multi and Single Ticket Drawing - pick only one single winner per draw or multi select.
- Force Re-shuffle -  After each draw, prevent further draw until the pool is re-shuffled for integrity purposes.
- Multi/Parallel Campaigns/Games - Run multiple campaigns in parallel through the session feature.
- Wallet system - Fund wallet, Withdraw, etc
- Packages (sub packages, discounts, pricing, promo, etc)
- Package Subscriptions / Auto - Ticket purchase placement  ( aka Routines or scheduler or cron jobs).
- Bank Account management - for withdrawals(cashout), stack different account details of choice.
- Prize Management - Assign / Map different prizes to different packages in different sessions/ campaigns. e.g : $200, $1000, Landed property, real estate, etc.
- User Management - Sign in / out, email verification, edit profile, etc
- Role Management
- Messaging / Notifications - Auto mails sent on Ticket purchase, all winning tickets owners receive message on pick, on each routine run , subscribers are notified etc
- And More...

## Contributing

Thank you for considering contributing to Raffle Draw! Please send a message to Ezugudor at nelsonsmrt@gmail.com lets kick start.

## Security Vulnerabilities

If you discover a security vulnerability within this app, please send an e-mail to Ezugudor at nelsonsmrt@gmail.com. All security vulnerabilities will be promptly addressed.

