---
extends: _layouts.post
section: content
title: Vowel spellchecker
problemUrl: https://leetcode.com/problems/vowel-spellchecker/
date: 2022-11-21
categories: [array-and-hashmap]
---

We will use a set to store the words in the wordlist. Then, we will use a dictionary to store the words in the wordlist with the vowels replaced with `*`. Then, we will iterate through the queries and check if the query is in the set. If it is, then we will add it to the result. If it is not, then we will check if the query is in the dictionary. If it is, then we will add the first word in the dictionary to the result. If it is not, then we will add an empty string to the result.

```python
class Solution:
    def spellchecker(self, wordlist: List[str], queries: List[str]) -> List[str]:
        def mask(word: List[str]) -> List[str]:
            return "".join('*' if c in 'aeiou' else c for c in word.lower())
        
        unique = set(wordlist)
        lower = {w.lower(): w for w in wordlist[::-1]}
        vowel = {mask(w): w for w in wordlist[::-1]}
        
        def solve(query):
            if query in unique: 
                return query
            if query.lower() in lower: 
                return lower[query.lower()]
            if mask(query) in vowel: 
                return vowel[mask(query)]
            return ""
        
        return [solve(q) for q in queries]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
