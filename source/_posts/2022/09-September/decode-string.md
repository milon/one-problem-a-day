---
extends: _layouts.post
section: content
title: Decode string
problemUrl: https://leetcode.com/problems/decode-string/
date: 2022-09-03
categories: [stack]
---

We will use a stack and append the values until we reach `]`. Then we pop the values from stack and make a string until we reach `[`. Then we pop the numbers from the stack and multiply it with the string and push it back to the stack. We will do it till the end of the input string. Finally we merge everything from the stack to a string and return that as our result.

```python
class Solution:
    def decodeString(self, s: str) -> str:
        stack = []
        
        for i in range(len(s)):
            if s[i] != ']':
                stack.append(s[i])
            else:
                curStr = ''
                while stack[-1] != '[':
                    curStr = stack.pop() + curStr
                stack.pop()
                
                num = ''
                while stack and stack[-1].isdigit():
                    num = stack.pop() + num
                
                stack.append(int(num) * curStr)
        
        return "".join(stack)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`