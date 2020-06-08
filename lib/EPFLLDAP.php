<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// https://github.com/epfl-sti/wordpress.plugin.ws/blob/master/inc/ldap.inc
/**
 * LDAP client for the EPFL directory
 */
 
 class EPFLLDAP {
  const LDAP_SERVER = "ldap.epfl.ch";
  const BASE_DN     = "o=epfl,c=ch";

  const SCOPE_SUBTREE  = 'subtree';
  const SCOPE_ONELEVEL = 'one';
  const SCOPE_BASE     = 'base';

  const SEARCH_PERSON_BY_SCIPER  = "(&(objectClass=person)(uniqueIdentifier=%s))";
  const SEARCH_PERSON_BY_EMAIL   = "(&(objectClass=person)(mail=%s))";
  const SEARCH_PERSON_BY_NAME    = "(&(objectClass=person)(displayName=*%s*))";
  
  // const SEARCH_UNIT_BY_CN        = "(&(objectClass=EPFLorganizationalUnit)(cn=%s))";
  // const SEARCH_UNIT_BY_OU        = "(&(objectClass=EPFLorganizationalUnit)(ou=%s))";
  // const SEARCH_UNIT_BY_UNIQUE_ID = "(&(objectClass=EPFLorganizationalUnit)(uniqueIdentifier=%d))";
  // const SEARCH_ALL_UNITS         = "(objectClass=EPFLorganizationalUnit)";
  // const SEARCH_ALL_PEOPLE        = "(objectClass=Person)";
  
  function __construct($base_dn = null) {
    if (! $base_dn) { $base_dn = self::BASE_DN; }
    $ldap = @ldap_connect(self::LDAP_SERVER);
    if (! ($ldap && @ldap_bind($ldap))) {
      trigger_error(
        sprintf(___('Unable to bind to LDAP server %s (error: %s)'),
          self::LDAP_SERVER,
          ldap_error($ld)
        )
      );
    } else {
      $this->LDAP = $ldap;
      ldap_set_option($this->LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
    }
  }
  
  function searchSciper($sciper) {
    return $this->search(sprintf(self::SEARCH_PERSON_BY_SCIPER, $sciper));
  }
  
  function searchEmail($email) {
    return $this->search(sprintf(self::SEARCH_PERSON_BY_EMAIL, $email));
  }
  
  function searchName($name) {
    return $this->search(sprintf(self::SEARCH_PERSON_BY_NAME, $name));
  }
  
  function search($filter, $attributes = array("*"), $scope = self::SCOPE_SUBTREE, $attrsOnly = 0, $sizeLimit = -1, $timeLimit = 0, $deref = LDAP_DEREF_NEVER) {
    
    switch ($scope) {
      // LDAP_SCOPE_BASE
      case self::SCOPE_BASE:
        $sr = ldap_read($this->LDAP, self::BASE_DN, $filter, $attributes, $attrsOnly, $sizeLimit, $timeLimit, $deref);
        break;
      // LDAP_SCOPE_ONELEVEL
      case self::SCOPE_ONELEVEL:
        $sr = ldap_list($this->LDAP, self::BASE_DN, $filter, $attributes, $attrsOnly, $sizeLimit, $timeLimit, $deref);
        break;
      // LDAP_SCOPE_SUBTREE
      case self::SCOPE_SUBTREE:
      default:
        $sr = ldap_search($this->LDAP, self::BASE_DN, $filter, $attributes, $attrsOnly, $sizeLimit, $timeLimit, $deref);
    }
    
    if ($sr !== false) {
      $entries = ldap_get_entries($this->LDAP, $sr);
      $entry_list = array();
      for($i = 0; $i < $entries["count"]; $i++) {
        array_push($entry_list, $entries[$i]);
      }
      return $entry_list;
    } else {
      trigger_error(
        sprintf(___('LDAP search error: %s %s (error: %s)'),
          self::LDAP_SERVER,
          $filter.' '.$this->ldapParams['server'],
          ldap_error($this->LDAP)
        )
      );
    }

  }
}