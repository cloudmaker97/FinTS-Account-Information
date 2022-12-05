<?php
namespace FinTSInfo;

use DateInterval;
use DateTime;
use Fhp\FinTs;

class AccountDetails {
    public $accountBalance;
    public $transactions;

    public function __construct()
    {
        $fints = new FinTs(getenv("FINTS_URL"), (int)getenv("FINTS_PORT"), getenv("FINTS_BANK"), getenv("FINTS_ACCOUNT"), getenv("FINTS_PASSWORD"));
        $sepaAccounts = $fints->getSEPAAccounts();
        $mainAccount = $sepaAccounts[0];
        $this->accountBalance = $fints->getSaldo($mainAccount);
        $transactionsFromDateTime = new DateTime();
        $transactionsFromDateTime->sub(DateInterval::createFromDateString('2 weeks'));
        $transactionsToDateTime = new DateTime();
        $this->transactions = $fints->getStatementOfAccount($mainAccount, $transactionsFromDateTime, $transactionsToDateTime)->getStatements()[0]->getTransactions();
    }
}