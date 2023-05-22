---
extends: _layouts.post
section: content
title: Check if word equals summation of two words
problemUrl: https://leetcode.com/problems/check-if-word-equals-summation-of-two-words/
date: 2023-05-19
categories: [array-and-hashmap]
---

We can convert the words to integers and check if the sum of the first two integers equals the third integer.

```python
class Solution:
    def isSumEqual(self, firstWord: str, secondWord: str, targetWord: str) -> bool:
        def convert(word: str) -> int:
            res = 0
            for c in word:
                res = res * 10 + ord(c) - ord('a')
            return res
        
        return convert(firstWord) + convert(secondWord) == convert(targetWord)
```

Time complexity: `O(n)` where n is the length of the longest word.
Space complexity: `O(1)`

We can also achieve the same result without converting the words to integers.

```python
class Solution:
    def isSumEqual(self, firstWord: str, secondWord: str, targetWord: str) -> bool:
        firstnumval = ''
        for i in firstWord: 
            firstnumval += str(ord(i) - 97)
            
        secondnumval = '' 
        for i in secondWord: 
            secondnumval += str(ord(i) - 97)
            
        targetnumval = ''
        for i in targetWord: 
            targetnumval += str(ord(i) - 97)
            
        return int(firstnumval) + int(secondnumval) == int(targetnumval)
```

Time complexity: `O(n)` where n is the length of the longest word. <br/>
Space complexity: `O(1)`