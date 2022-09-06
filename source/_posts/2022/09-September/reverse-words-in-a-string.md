---
extends: _layouts.post
section: content
title: Reverse words in a string
problemUrl: https://leetcode.com/problems/reverse-words-in-a-string/
date: 2022-09-06
categories: [array-and-hashmap]
---

We will strip the extra space and then split the string with space. Finally, we reverse the words, combine them to a string and return.

```python
class Solution:
    def reverseWords(self, s: str) -> str:
        words = s.strip().split()

        return " ".join(reversed(words))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
