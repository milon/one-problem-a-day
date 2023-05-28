---
extends: _layouts.post
section: content
title: Vowels of all substrings
problemUrl: https://leetcode.com/problems/vowels-of-all-substrings/
date: 2023-05-28
categories: [dynamic-programming]
---

We can use bottom-up dynamic programming to solve the problem. We will use a variable `vowels` to store the number of vowels in the string. Then we will iterate over the string and update `vowels` accordingly. Finally, we will return `vowels`.

```python
class Solution:
    def countVowels(self, word: str) -> int:
        vowel = {'a':0, 'e':0, 'i':0, 'o':0, 'u':0}
        n = len(word)
    
        for i in range(n):
            if word[i] in vowel:
                vowel[word[i]] += (i+1)*(n-i) 
      
        return sum(vowel.values())
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
