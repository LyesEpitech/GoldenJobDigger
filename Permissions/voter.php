<?php declare(strict_types=1);

namespace Golden ;
 
 

interface Voter{

public function canVote (string $permission , $object = null): bool;
public function vote (User $User , string $permission , $object = null): bool;


}

?>