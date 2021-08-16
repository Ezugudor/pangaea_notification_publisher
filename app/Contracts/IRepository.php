<?php

namespace App\Contracts;

use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Object_;
use stdClass;

interface IRepository
{
    /**
     * Retrieves a single user.
     * @param string $id The unique ID of the user to be retrieved
     * @return mixed
     * @throws RepositoryException
     */
    public function find(string $id);

    /**
     * Retrieves all users.
     * @return mixed
     * @throws RepositoryException
     */
    public function findAll(): Collection;



    /**
     * Soft Delete entity.
     * @param string $id ID of the user to be deleted.
     * @return bool
     * @throws RepositoryException
     */
    public function delete(string $id);

    /**
     * Force Delete entity.
     * @param string $id ID of the user to be deleted.
     * @return bool
     * @throws RepositoryException
     */
    public function forceDelete(string $id);
}
