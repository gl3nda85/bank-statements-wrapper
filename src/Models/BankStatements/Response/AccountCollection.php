<?php
/**
 * Created by IntelliJ IDEA.
 * User: dylanaird
 * Date: 17/11/16
 * Time: 2:38 AM
 */

namespace BankStatement\Models\BankStatements\Response;


use BankStatement\Models\BankStatements\Account;
use BankStatement\Models\BankStatements\Response\Collection;

class AccountCollection
{
    /**
     * @var Account
     */
    private $accounts;


    /**
     * @param Account[] $addresses
     */

    public function __construct(array $accounts = [])
    {
        $this->accounts = array_values($accounts);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->all());
    }
    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->accounts);
    }
    /**
     * @return Account
     */
    public function first()
    {
        if (empty($this->accounts)) {
            //throw new CollectionIsEmpty('The AddressCollection instance is empty.');
        }
        return reset($this->accounts);
    }
    /**
     * @return Account[]
     */
    public function slice($offset, $length = null)
    {

        return array_slice($this->accounts, $offset, $length);
    }
    /**
     * @return bool
     */
    public function has($index)
    {
        return isset($this->accounts[$index]);
    }
    /**
     * @return Account
     * @throws \OutOfBoundsException
     */
    public function get($index)
    {
        if (!isset($this->accounts[$index])) {
            throw new \OutOfBoundsException(sprintf('The index "%s" does not exist in this collection.', $index));
        }
        return $this->accounts[$index];
    }
    /**
     * @return Account[]
     */
    public function all()
    {
        return $this->accounts;
    }

}