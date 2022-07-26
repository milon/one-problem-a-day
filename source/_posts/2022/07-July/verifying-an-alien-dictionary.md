---
extends: _layouts.post
section: content
title: Verifying an alien dictionary
problemUrl: https://leetcode.com/problems/verifying-an-alien-dictionary/
date: 2022-07-26
categories: [graph]
---

This is actually a subproblem of alien dictionary. First we will create a function for checking lexical order of 2 words based on the input order. We will go through each characters of the words, and check whether it matches with the given order string. If matches then we return true otherwise false. Now we will go through each word pair and check whether they are lexically ordered or not and return the result.

```python
class Solution:
    def isAlienSorted(self, words: List[str], order: str) -> bool:
        for i in range(len(words)-1):
            if not self.lexicalOrder(words[i], words[i+1], order):
                return False
        return True
    
    def lexicalOrder(self, word1: str, word2: str, alphabet: str) -> bool:
        length = max(len(word1), len(word2))
        for i in range(length):
            value1 = alphabet.index(word1[i]) if i < len(word1) else -math.inf
            value2 = alphabet.index(word2[i]) if i < len(word2) else -math.inf
            if value1 < value2:
                return True
            elif value2 < value1:
                return False
        return True
```

Time Complexity: `O(n*k)`, n is the number of words and k is the length of longest word. <br/>
Space Complexity: `O(1)`