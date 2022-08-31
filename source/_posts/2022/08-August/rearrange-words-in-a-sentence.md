---
extends: _layouts.post
section: content
title: Rearrange words in a sentence
problemUrl: https://leetcode.com/problems/rearrange-words-in-a-sentence/
date: 2022-08-31
categories: [array-and-hashmap]
---

We will split the word with space as delimeter, sort them according to their length, join then again with space, finally return the capitalize string.

```python
class Solution:
    def arrangeWords(self, text: str) -> str:
        arr = sorted(text.split(' '), key=len)
        res = " ".join(arr)
        return res.capitalize()
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`