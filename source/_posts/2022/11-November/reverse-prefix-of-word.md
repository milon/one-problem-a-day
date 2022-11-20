---
extends: _layouts.post
section: content
title: Reverse prefix of word
problemUrl: https://leetcode.com/problems/reverse-prefix-of-word/
date: 2022-11-20
categories: [array-and-hashmap]
---

We will iterate through the word and check if the current character is equal to the first character of the prefix. If it is, we will reverse the prefix and return the word.

```python
class Solution:
    def reversePrefix(self, word: str, ch: str) -> str:
        if ch not in word:
            return word
        i = word.index(ch)
        return word[i::-1] + word[i+1:]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`