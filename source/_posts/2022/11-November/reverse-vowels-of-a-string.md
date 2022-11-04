---
extends: _layouts.post
section: content
title: Reverse vowels of a string
problemUrl: https://leetcode.com/problems/reverse-vowels-of-a-string/
date: 2022-11-04
categories: [stack]
---

We will iterate over the string, and if the character is a vowel, we will add it to a stack. Then we will iterate over the string again, and if the character is a vowel, we will pop the stack and add it to the result. If the character is not a vowel, we will add it to the result.

```python
class Solution:
    def reverseVowels(self, s: str) -> str:
        vowels = {'A', 'a', 'E', 'e', 'I', 'i', 'O', 'o', 'U', 'u'}
        
        stack = []
        for c in s:
            if c in vowels:
                stack.append(c)
        
        list_s = list(s)
        for i, c in enumerate(list_s):
            if c in vowels:
                list_s[i] = stack.pop()
        
        return ''.join(list_s)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`