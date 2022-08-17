---
extends: _layouts.post
section: content
title: Unique morse code words
problemUrl: https://leetcode.com/problems/unique-morse-code-words/
date: 2022-08-17
categories: [array-and-hashmap]
---

We will translate each word to a morse code and then add that to a set. Finally return the number of elements of that set.

```python
class Solution:
    def uniqueMorseRepresentations(self, words: List[str]) -> int:
        morse = [".-","-...","-.-.","-..",".","..-.","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",".-.","...","-","..-","...-",".--","-..-","-.--","--.."]
        res = set()
        for word in words:
            code = ''
            for c in word:
                code += morse[ord(c)-ord('a')]
            res.add(code)
        return len(res)
```

Time Complexity: `O(n*m)`, n is the number of words, m is length of largest word. <br/>
Space Complexity: `O(n)`
