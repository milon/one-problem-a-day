---
extends: _layouts.post
section: content
title: Iterator for combination
problemUrl: https://leetcode.com/problems/iterator-for-combination/
date: 2022-09-17
categories: [design, backtracking]
---

We will generate all the combination using backtracking and store it in the class. Then for each next call, we will increase our index and return the value of previous index. For hasNext, we will just check whether our index already reached the end of our combination list.

```python
class CombinationIterator:

    def __init__(self, characters: str, combinationLength: int):
        self.result = []
        self._backtrack(characters, self.result, [], combinationLength)
        self.index = 0

    def next(self) -> str:
        temp = self.result[self.index]
        self.index += 1
        return temp

    def hasNext(self) -> bool:
        return self.index < len(self.result)

    def _backtrack(self, characters, result, temp, length):
        if len(temp) == length:
            result.append("".join(temp))
        if len(temp) > length:
            return
        
        for i in range(len(characters)):
            self._backtrack(characters[i + 1:], result, temp + [characters[i]], length)

# Your CombinationIterator object will be instantiated and called as such:
# obj = CombinationIterator(characters, combinationLength)
# param_1 = obj.next()
# param_2 = obj.hasNext()
```

Time Complexity: `O(nCk)`, n is the number of character in the string, k is the length of combination <br/>
Space Complexity: `O(n)`
