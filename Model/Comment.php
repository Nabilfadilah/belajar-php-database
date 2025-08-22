<?php

// namespace model
namespace Model {

    // class comment
    class Comment
    {
        // construct untuk parameter table comment, harus sesui dengan data di table mysql
        public function __construct(
            private ?int $id = null,
            private ?string $email = null,
            private ?string $comment = null
        ) {}

        /**
         * @return int|null
         */
        // get parameter id yang bertipe data int 
        public function getId(): ?int
        {
            return $this->id;
        }

        /**
         * @param int|null $id
         */
        // setId dan berikan parameter $id
        public function setId(?int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string|null
         */
        // get parameter email yang bertipe data string
        public function getEmail(): ?string
        {
            return $this->email;
        }

        /**
         * @param string|null $email
         */
        // setEmail dan berikan parameter $email
        public function setEmail(?string $email): void
        {
            $this->email = $email;
        }

        /**
         * @return string|null
         */
        // get parameter comment yang bertipe data string
        public function getComment(): ?string
        {
            return $this->comment;
        }

        /**
         * @param string|null $comment
         */
        // setEmail dan berikan parameter $comment
        public function setComment(?string $comment): void
        {
            $this->comment = $comment;
        }
    }
}
