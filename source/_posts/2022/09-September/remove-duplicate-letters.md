---
extends: _layouts.post
section: content
title: Remove duplicate letters
problemUrl: https://leetcode.com/problems/remove-duplicate-letters/
date: 2022-09-05
categories: [stack]
---

We will create a hashmap to keep track of last occurance of the letters. Then we will have a visited hashset and a stack to keep track of the letters. We traverse sequentially on the string, for each character we check whether it's already in stack or not, if its not in the stack, we need to push it to the stack. But we need to check another condition before pushing. If `s[i]` is not in the stack (we can check using this in O(1) using a set), and it is smaller than previous elements in stack (lexicographically), and those elements are repeating in future (can check with last occurance), we need to pop these elements. Now we can push `s[i]` in stack. Finally just join the characters in stack to form the result and return it.

We are using visited set to check whether `s[i]` is in stack or not in O(1) time, to improve time complexity.

Example:
```
s = 'bcabc'
last_occ = { a : 2, b : 3, c : 4 }
stack trace:
[]
[ 'b' ]
[ 'b', 'c' ]
[ 'a' ] (b & c got popped because a < c, a < b and b and c both were gonna repeat in future)
[ 'a' , 'b' ]
[ 'a' , 'b', 'c' ]
```

```python
class Solution:
    def removeDuplicateLetters(self, s: str) -> str:
        lastOccurance = {}
        for i, c in enumerate(s):
            lastOccurance[c] = i
        
        stack = []
        visited = set()
        for i, c in enumerate(s):
            if c not in visited:
                while stack and stack[-1] > c and lastOccurance[stack[-1]] > i:
                    visited.remove(stack.pop())
                stack.append(c)
                visited.add(c)
        
        return ''.join(stack)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`