<?php
    interface User
    {
        public function __construct($id);

        public function getContacts($strategy);
    }